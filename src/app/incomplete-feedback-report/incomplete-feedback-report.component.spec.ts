import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { IncompleteFeedbackReportComponent } from './incomplete-feedback-report.component';

describe('IncompleteFeedbackReportComponent', () => {
  let component: IncompleteFeedbackReportComponent;
  let fixture: ComponentFixture<IncompleteFeedbackReportComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IncompleteFeedbackReportComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IncompleteFeedbackReportComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
