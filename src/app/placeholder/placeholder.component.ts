import { Component, OnInit, ElementRef } from '@angular/core';
import { Http } from '@angular/http';
import { Router } from '@angular/router';
import { ActivatedRoute } from '@angular/router';
import { PlaceholderService } from '../services/placeholder.service';
import { CommonService } from '../services/common.service';
import { Globals } from '.././globals';
declare var $,swal: any;
declare function myInput(): any;

@Component({
	selector: 'app-placeholder',
	templateUrl: './placeholder.component.html',
	styleUrls: ['./placeholder.component.css']
})

export class PlaceholderComponent implements OnInit {
	placeholderEntity;
	tableList;
	columnList;
	submitted;
	btn_disable;
	header;

	constructor(private el: ElementRef, private http: Http, private router: Router, private route: ActivatedRoute,
		private PlaceholderService: PlaceholderService, public globals: Globals, private CommonService: CommonService) {

	}
	ngOnInit() {
		this.globals.pageTitle = '- Placeholder';
		$("footer").addClass("footer_admin");
		$("body").tooltip({
		selector: "[data-toggle='tooltip']"
	});
	if ( $('#container').hasClass( "active_ulmainscreen" ) ) { 
		$('.col-md-10.col-sm-12.col-md-offset-2').addClass("active_divmainscreen");
	} else {
	$('.col-md-10.col-sm-12.col-md-offset-2').removeClass("active_divmainscreen");
  }
		this.globals.isLoading = true;
		// if(this.globals.authData.RoleId!=5){
		// 	this.router.navigate(['/pagenotfound']);
		//   }

		if(this.globals.authData.RoleId==5){		
			this.default();
		} else {
			this.CommonService.get_permissiondata({'RoleId':this.globals.authData.RoleId,'screen':'Placeholder Screen'})
			.then((data) => 
			{
				if(data['AddEdit']==1){
					this.default();
				} else {
					this.router.navigate(['/pagenotfound']);
				}
			},
			(error) => 
			{
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});	
		}
	}

	default(){
		this.placeholderEntity = {};
		this.columnList = [];
		let id = this.route.snapshot.paramMap.get('id');
		this.globals.msgflag = false;
		this.PlaceholderService.getTableList()
			.then((data) => {
				this.tableList = data;
				this.globals.isLoading = false;
			},
			(error) => {
				this.globals.isLoading = false;
				this.router.navigate(['/pagenotfound']);
			});
		if (id) {
			this.header = 'Edit';
			this.PlaceholderService.getById(id)
				.then((data) => {
					if (data != "") {
						this.placeholderEntity = data;
						if (this.placeholderEntity.TableId > 0) {
							this.PlaceholderService.getColumnList(this.placeholderEntity.TableId)
								.then((data) => {
									this.columnList = data;
									this.globals.isLoading = false;
									setTimeout(function(){
										myInput();
								  },100); 
								},
								(error) => {
									this.globals.isLoading = false;
								});
						}
					} else {
						this.router.navigate(['/dashboard']);
					}
				},
				(error) => {
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		} else {
			this.header = 'Add';
			this.placeholderEntity = {};
			this.placeholderEntity.PlaceholderId = 0;
			this.placeholderEntity.IsActive = '1';
			this.placeholderEntity.TableId = '';
			this.placeholderEntity.ColumnId = '';
			myInput();	
		}
		setTimeout(function(){
			$(".test").removeClass("active");
			$(".test").parent().removeClass("in");
			$(".placeholder").parent().addClass("in");
			$(".email").addClass("active"); 
			$(".placeholder").addClass("active");
			if ($("body").height() < $(window).height()) {  
				$('footer').addClass('footer_fixed');     
			}      
			else{  
				$('footer').removeClass('footer_fixed');    
			}	       		
		},500);
	}

	addPlaceholder(placeholderForm) {
		
		let id = this.route.snapshot.paramMap.get('id');
		if (id) {
			this.placeholderEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = false;
		} else {
			this.placeholderEntity.CreatedBy = this.globals.authData.UserId;
			this.placeholderEntity.UpdatedBy = this.globals.authData.UserId;
			this.submitted = true;
		}
		if (placeholderForm.valid) {
			this.btn_disable = true;
			this.PlaceholderService.add(this.placeholderEntity)
				.then((data) => {
					this.btn_disable = false;
					this.submitted = false;
					this.placeholderEntity = {};
					placeholderForm.form.markAsPristine();
					if (id) {
					
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Placeholder updated successfully',
							showConfirmButton: false,
							timer: 1500
						})
					} else {
						this.globals.message = 'Placeholder added successfully';
						swal({
							position: 'top-end',
							type: 'success',
							title: 'Placeholder added successfully',
							showConfirmButton: false,
							timer: 1500
						})
					}
					this.router.navigate(['/placeholder/list']);
				},
				(error) => {
					this.btn_disable = false;
					this.submitted = false;
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		}
	}

	clearForm(placeholderForm) {
		this.placeholderEntity = {};
		this.placeholderEntity.PlaceholderId = 0;
		this.placeholderEntity.IsActive = '1';
		this.placeholderEntity.TableId = '';
		this.placeholderEntity.ColumnId = '';
		this.columnList = [];
		this.submitted = false;
		placeholderForm.form.markAsPristine();
	}

	getColumnList(placeholderForm) {
		
		placeholderForm.form.controls.ColumnId.markAsDirty();
		this.placeholderEntity.ColumnId = '';
		if (this.placeholderEntity.TableId > 0) {
			this.PlaceholderService.getColumnList(this.placeholderEntity.TableId)
				.then((data) => {
					this.columnList = data;
				},
				(error) => {
					this.globals.isLoading = false;
					this.router.navigate(['/pagenotfound']);
				});
		} else {
			this.columnList = [];
		}
	}

}

