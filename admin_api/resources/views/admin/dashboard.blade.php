@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url(route('admin_dashboard'))}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid">
	<div class="quick-actions_homepage">
      <ul class="quick-actions">
      </ul>
    </div>
	
<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <!--<div class="chart"></div>-->
		
<!-- get users data and extract users on single date  -->
		<?php
			foreach ($data['users'] as $key) {
				$array= explode(" ",$key["created_at"]);
				$array_result[] = $array[0];
			}
			$users_count = array_count_values($array_result);
		?>
	
<!-- create array which will use to create chart -->
		<?php 
			   $ticker = 0;
			   $array_chart_11 = array();
			Foreach($users_count as $key => $val){
				$array_chart_11[$ticker]['datelabel'] = "({$key})";
				$array_chart_11[$ticker]['label'] = "Users";
				$array_chart_11[$ticker]['y'] = $val;
				$ticker++;
			}
			?>
			  <div id="chartContainer_users" ></div>
			  <div class="chart" style="visibility:hidden;"></div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong>{{$data["user_count"]}}</strong> <small>Total Users</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>4</strong> <small>New Users </small></li>
                <!--<li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--End-Chart-box--> 
  </div>
</div>
<!--end-main-container-part-->
@endsection
<!-- charts script -->
<script type="text/javascript">
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer_users", {
					axisY:{valueFormatString: " ",tickLength: 0,labelFontColor: "#FFFFFF",gridColor: "#FFFFFF"},
					axisX:{valueFormatString: " ",tickLength: 0,labelFontColor: "#FFFFFF",gridColor: "#FFFFFF"},
					showScale: false,
					height:270,
                    theme: "theme2",
                    animationEnabled: true,
					toolTip:{ content: "{datelabel}  {label}: {y}"  },

                    data: [{
						color: "#66BADB",
                        type: "spline",  
						name1: "Visits",		
						name2: "Unique",								
                        dataPoints: <?php echo json_encode($array_chart_11, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            });
	</script>
@yield('footer')