import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { InformationPage } from '../information/information';
import { ReferalPage } from '../referal/referal';
import { SubmissionPage } from '../submission/submission';
import { MapPage } from '../map/map';
/**
 * Generated class for the WelcomePage page.
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-welcome',
  templateUrl: 'welcome.html',
})
export class WelcomePage {

  //username = localStorage.username;
  username: any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
      this.username = localStorage.username;
  }


  ionViewDidLoad() {
    console.log('ionViewDidLoad WelcomePage');
  }

  give_info(){
    this.navCtrl.push(InformationPage);
  }
  
  refer_friend(){
	    this.navCtrl.push(ReferalPage);
  }

  my_submission(){
	    this.navCtrl.push(SubmissionPage);
  }
	
   map_view(){
	    this.navCtrl.push(MapPage);
  }

}
