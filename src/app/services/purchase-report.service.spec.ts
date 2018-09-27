import { TestBed, inject } from '@angular/core/testing';

import { PurchaseReportService } from './purchase-report.service';

describe('PurchaseReportService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [PurchaseReportService]
    });
  });

  it('should be created', inject([PurchaseReportService], (service: PurchaseReportService) => {
    expect(service).toBeTruthy();
  }));
});
