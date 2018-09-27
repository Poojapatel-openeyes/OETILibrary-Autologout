import { TestBed, inject } from '@angular/core/testing';

import { PurchaseLicensepackService } from './purchase-licensepack.service';

describe('PurchaseLicensepackService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [PurchaseLicensepackService]
    });
  });

  it('should be created', inject([PurchaseLicensepackService], (service: PurchaseLicensepackService) => {
    expect(service).toBeTruthy();
  }));
});
