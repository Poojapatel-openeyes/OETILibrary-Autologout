import { Component,ViewEncapsulation } from '@angular/core';
import { HostBinding, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import { Observable } from 'rxjs/observable';
import { Globals } from './globals';
import { Router } from '@angular/router';
import { AuthService } from './services/auth.service';
const MINUTES_UNITL_AUTO_LOGOUT = 0.25// in mins
const CHECK_INTERVAL = 15000 // in ms
const STORE_KEY = 'lastAction';
declare var $,swal: any;

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  encapsulation: ViewEncapsulation.None
})
export class AppComponent {
    public getLastAction() {
      return parseInt(localStorage.getItem(STORE_KEY));
    }
    public setLastAction(lastAction: number) {
      localStorage.setItem(STORE_KEY, lastAction.toString());
    }
  
    constructor(private router: Router,public globals: Globals,private authService : AuthService) {
      console.log('object created');
      this.check();
      this.initListener();
      this.initInterval();
    }
    initListener() {
      document.body.addEventListener('click', () => this.reset());
      document.body.addEventListener('mouseover', () => this.reset());
      document.body.addEventListener('mouseout', () => this.reset());
      document.body.addEventListener('keydown', () => this.reset());
      document.body.addEventListener('keyup', () => this.reset());
      document.body.addEventListener('keypress', () => this.reset());
    }
  
    reset() {
      this.setLastAction(Date.now());
    }
  
    initInterval() {
      setInterval(() => {
        this.check();
      }, CHECK_INTERVAL);
    }
  
    check() {
      const now = Date.now();
      const timeleft = this.getLastAction() + MINUTES_UNITL_AUTO_LOGOUT * 60 * 1000;
      const diff = timeleft - now;
      const isTimeout = diff < 0;
 
      if (isTimeout) {
       // alert('sd');
       
      localStorage.clear();
        // this.router.navigate(['/login']);
        //alert('hi');
        // swal({
        //   type: 'error',
        //   title: 'Oops...',
        //   text: 'Something went wrong!',
        //   footer: '<a href>Why do I have this issue?</a>'
        // }).then((result) => {
        //   if (result.value) {
            this.authService.autologout(this.globals.authData.UserId)
          // }})
       
        
      

      }
    }

  
  
}
