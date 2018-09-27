import { TestBed, inject } from '@angular/core/testing';

import { LicenceTypeService } from './licence-type.service';

describe('LicenceTypeService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LicenceTypeService]
    });
  });

  it('should be created', inject([LicenceTypeService], (service: LicenceTypeService) => {
    expect(service).toBeTruthy();
  }));
});
