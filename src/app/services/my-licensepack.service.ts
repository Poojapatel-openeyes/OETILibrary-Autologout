import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import {HttpClient} from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class MyLicensepackService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) {  }
  getAll(UserId){ 
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'MyLicensePack/getAll/'+UserId)
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
    add(InvitationEntity)
  {
    debugger
   let promise = new Promise((resolve, reject) => {
     this.http.post(this.globals.baseAPIUrl + 'MyLicensePack/add', InvitationEntity)
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
