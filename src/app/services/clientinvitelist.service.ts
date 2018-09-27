import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import {HttpClient} from "@angular/common/http";
import { Globals } from '.././globals';
import { Router } from '@angular/router';
@Injectable()
export class ClientinvitelistService {

  constructor(private http: HttpClient,private globals: Globals, private router: Router) { }

  getAll()
   {
   let promise = new Promise((resolve, reject) => {
     this.http.get(this.globals.baseAPIUrl + 'ClientInviteList/getAll')
       .toPromise()
       .then(
         res => { // Success
           resolve(res);
         },
         msg => { // Error
       reject(msg);
       this.globals.isLoading = false;
       this.router.navigate(['/pagenotfound']);
         }
       );
   });		
   return promise;
   }
 delete(del)
   {
   let promise = new Promise((resolve, reject) => {		
     this.http.post(this.globals.baseAPIUrl + 'ClientInviteList/delete', del)
       .toPromise()
       .then(
         res => { // Success
           resolve(res);
         },
         msg => { // Error
       reject(msg);
       this.globals.isLoading = false;
       this.router.navigate(['/pagenotfound']);
         }
       );
   });		
   return promise;
   }
   
  ReInvite(UserInvitationId)
   {
   let promise = new Promise((resolve, reject) => {		
     this.http.post(this.globals.baseAPIUrl + 'ClientInviteList/ReInvite/' ,UserInvitationId)
       .toPromise()
       .then(
         res => { // Success
           resolve(res);
         },
         msg => { // Error
       reject(msg);
       this.globals.isLoading = false;
       this.router.navigate(['/pagenotfound']);
         }
       );
   });		
   return promise;
   }

  invimsg()
   {
   let promise = new Promise((resolve, reject) => {
     this.http.get(this.globals.baseAPIUrl + 'ClientInviteList/invimsg')
       .toPromise()
       .then(
         res => { // Success
           resolve(res);
         },
         msg => { // Error
       reject(msg);
       this.globals.isLoading = false;
       this.router.navigate(['/pagenotfound']);
         }
       );
   });		
   return promise;
   }
  }
 
 
