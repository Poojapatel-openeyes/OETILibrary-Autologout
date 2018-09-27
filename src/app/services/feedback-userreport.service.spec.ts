import { TestBed, inject } from '@angular/core/testing';

import { FeedbackUserreportService } from './feedback-userreport.service';

describe('FeedbackUserreportService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [FeedbackUserreportService]
    });
  });

  it('should be created', inject([FeedbackUserreportService], (service: FeedbackUserreportService) => {
    expect(service).toBeTruthy();
  }));
});
