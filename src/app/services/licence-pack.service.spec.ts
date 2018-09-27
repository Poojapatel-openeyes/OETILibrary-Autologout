import { TestBed, inject } from '@angular/core/testing';

import { LicencePackService } from './licence-pack.service';

describe('LicencePackService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LicencePackService]
    });
  });

  it('should be created', inject([LicencePackService], (service: LicencePackService) => {
    expect(service).toBeTruthy();
  }));
});
