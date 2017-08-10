import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { StackholderinformationPage } from '../information/stackholderinformation';
import { SubmitphotoPage } from '../information/submitphoto';
/**
 * Generated class for the InformationPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-projectdetail',
  templateUrl: 'projectdetail.html',
})
export class ProjectdetailPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    //console.log('ionViewDidLoad InformationPage');
  }

  site_photo(){
    this.navCtrl.push(SubmitphotoPage);
  }

  stackholder_information(){
    this.navCtrl.push(StackholderinformationPage);
  }




}
