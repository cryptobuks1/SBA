import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { AuthService } from '../../providers/auth-service/auth-service';
import { IonicPage, NavParams, NavController, LoadingController, ToastController } from 'ionic-angular';
import { HomePage } from '../home/home';

/**
 * Generated class for the ForgotPasswordPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-forgot-password',
  templateUrl: 'forgot-password.html',
})
export class ForgotPasswordPage {

  loading: any;
  forgetdata = { login_email:''};
  data: any;
  user_detail:{};
  resetForm: FormGroup;

  constructor(public navCtrl: NavController, public authService: AuthService, public navParams: NavParams, public loadingCtrl: LoadingController, private toastCtrl: ToastController, public formdata: FormBuilder) {
      this.resetForm = this.formdata.group({
            email: ['', [Validators.required, Validators.email]],
      });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ForgotPasswordPage');
  }

  reset_password(){
    this.showLoader();
    this.authService.reset(this.forgetdata).then((result) => {
      this.data = result;
      console.log(result);
      if(this.data){ 
        if(this.data.status_code==200){
            this.loading.dismiss();
            this.navCtrl.setRoot(HomePage);
        }else{
          this.loading.dismiss();
          alert(this.data.ack);
        }
      }else{
        this.loading.dismiss();
        alert(this.data.ack);
      }
    }, (err) => {
      this.loading.dismiss();
      this.presentToast(err);
    });
  }

  showLoader(){
    this.loading = this.loadingCtrl.create({
        content: ''
    });
    this.loading.present();
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 3000,
      position: 'bottom',
      dismissOnPageChange: true
    });

    toast.onDidDismiss(() => {
      console.log('Dismissed toast');
    });

    toast.present();
  }

}
