import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ProjectdetailPage } from '../information/projectdetail';
/**
 * Generated class for the InformationPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-createproject',
  templateUrl: 'createproject.html',
})
export class CreateprojectPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad InformationPage');
  }

  project_detail(){
      this.navCtrl.push(ProjectdetailPage);
  }


}
