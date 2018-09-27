import { Injectable } from '@angular/core';
import { Globals } from '.././globals';
import { HttpClient } from "@angular/common/http";
import { Router } from '@angular/router';

@Injectable()
export class ProvideLicenseService {

  constructor(private http: HttpClient, private globals: Globals, private router: Router) { 
  }
  getAll(){   
    debugger  
    let promise = new Promise((resolve, reject) => {     
      this.http.get(this.globals.baseAPIUrl + 'ProvideLicense/getAll')
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
      this.http.post(this.globals.baseAPIUrl + 'ProvideLicense/addPurchase/' ,PurchaseEntity)
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
