import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PurchaseLicensepackComponent } from './purchase-licensepack.component';

describe('PurchaseLicensepackComponent', () => {
  let component: PurchaseLicensepackComponent;
  let fixture: ComponentFixture<PurchaseLicensepackComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PurchaseLicensepackComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PurchaseLicensepackComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
