import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ReferfriendPage } from '../referfriend/referfriend';

/**
 * Generated class for the ReferalPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-referal',
  templateUrl: 'referal.html',
})
export class ReferalPage {
  refer_tab: any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.refer_tab = "Pending";
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ReferalPage');
  }

  referfriend(){
	  this.navCtrl.push(ReferfriendPage);
	  
  }

}
