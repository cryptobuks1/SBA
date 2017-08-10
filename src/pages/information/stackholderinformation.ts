import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ConsultantPage } from '../consultant/consultant';

/**
 * Generated class for the InformationPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-stackholderinformation',
  templateUrl: 'stackholderinformation.html',
})
export class StackholderinformationPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad InformationPage');
  }
  
  main_consultant(){
	  
	 this.navCtrl.push(ConsultantPage);
	  
  }




}
