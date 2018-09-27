import { TestBed, inject } from '@angular/core/testing';

import { MyLicensepackService } from './my-licensepack.service';

describe('MyLicensepackService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MyLicensepackService]
    });
  });

  it('should be created', inject([MyLicensepackService], (service: MyLicensepackService) => {
    expect(service).toBeTruthy();
  }));
});
