import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Globals } from '.././globals';
import {HttpClient} from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class PurchaseLicensepackService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) {  }
  getAll(){ 
    debugger
    let promise = new Promise((resolve, reject) => {
      this.http.get(this.globals.baseAPIUrl + 'PurchaseLicensePack/getAll')
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
    addPurchase(PurchaseEntity)
    {
      debugger
    let promise = new Promise((resolve, reject) => {		
      this.http.post(this.globals.baseAPIUrl + 'PurchaseLicensePack/addPurchase/' ,PurchaseEntity)
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
