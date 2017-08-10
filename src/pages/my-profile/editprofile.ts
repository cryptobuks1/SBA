import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { SubmissionPage } from '../submission/submission';
import { MyProfilePage } from '../my-profile/my-profile';
/**
 * Generated class for the EditprofilePage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-editprofile',
  templateUrl: 'editprofile.html',
})
export class EditprofilePage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad EditprofilePage');
  }

  cancel(){
    this.navCtrl.push(MyProfilePage);
  }

}
