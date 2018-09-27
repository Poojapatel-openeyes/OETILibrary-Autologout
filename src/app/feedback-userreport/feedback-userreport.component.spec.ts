import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FeedbackUserreportComponent } from './feedback-userreport.component';

describe('FeedbackUserreportComponent', () => {
  let component: FeedbackUserreportComponent;
  let fixture: ComponentFixture<FeedbackUserreportComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FeedbackUserreportComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FeedbackUserreportComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
