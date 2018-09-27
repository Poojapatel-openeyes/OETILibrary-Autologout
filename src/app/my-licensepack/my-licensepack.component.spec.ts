import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MyLicensepackComponent } from './my-licensepack.component';

describe('MyLicensepackComponent', () => {
  let component: MyLicensepackComponent;
  let fixture: ComponentFixture<MyLicensepackComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyLicensepackComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MyLicensepackComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
