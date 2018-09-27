import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DiscountTypeListComponent } from './discount-type-list.component';

describe('DiscountTypeListComponent', () => {
  let component: DiscountTypeListComponent;
  let fixture: ComponentFixture<DiscountTypeListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DiscountTypeListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DiscountTypeListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
