import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import {HttpClient} from "@angular/common/http";
import { Globals } from '.././globals';
import { Router } from '@angular/router';
@Injectable()
export class UserscoreService {

  constructor(private http: HttpClient,private globals: Globals, private router: Router) { }
  userscore(data)
  {debugger
  let promise = new Promise((resolve, reject) => {		
    this.http.post(this.globals.baseAPIUrl + 'Userscore/getall' ,data)
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

  getUserList(data)
  {
  let promise = new Promise((resolve, reject) => {		
    this.http.post(this.globals.baseAPIUrl + 'Userscore/getUserList',  data)
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

  getScore(UserId)
  {
  let promise = new Promise((resolve, reject) => {		
    this.http.get(this.globals.baseAPIUrl + 'Userscore/getScore/' + UserId)
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

  getAllScore(data)
  {
  let promise = new Promise((resolve, reject) => {		
    this.http.post(this.globals.baseAPIUrl + 'Userscore/getAllScore' ,data)
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
