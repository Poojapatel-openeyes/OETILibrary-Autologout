import { TestBed, inject } from '@angular/core/testing';

import { DiscountTypeService } from './discount-type.service';

describe('DiscountTypeService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [DiscountTypeService]
    });
  });

  it('should be created', inject([DiscountTypeService], (service: DiscountTypeService) => {
    expect(service).toBeTruthy();
  }));
});
