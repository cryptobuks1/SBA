import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { EditprofilePage } from '../my-profile/editprofile';
import { MymoneyPage } from '../mymoney/mymoney';

/**
 * Generated class for the MyProfilePage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-my-profile',
  templateUrl: 'my-profile.html',
})
export class MyProfilePage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MyProfilePage');
  }
  
  edit_profile(){
	this.navCtrl.push(EditprofilePage);  
  }
  
  get_money(){
	this.navCtrl.push(MymoneyPage);  
  }

}
