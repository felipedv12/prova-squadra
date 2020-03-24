import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BuscaSistemaComponent } from './busca-sistema.component';

describe('BuscaSistemaComponent', () => {
  let component: BuscaSistemaComponent;
  let fixture: ComponentFixture<BuscaSistemaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BuscaSistemaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BuscaSistemaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
