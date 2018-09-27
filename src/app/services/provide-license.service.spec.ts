import { TestBed, inject } from '@angular/core/testing';

import { ProvideLicenseService } from './provide-license.service';

describe('ProvideLicenseService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ProvideLicenseService]
    });
  });

  it('should be created', inject([ProvideLicenseService], (service: ProvideLicenseService) => {
    expect(service).toBeTruthy();
  }));
});
