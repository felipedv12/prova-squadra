import {Component, OnInit} from '@angular/core';
import {SistemaService} from '../../../service/sistema.service';
import {Observable} from 'rxjs';
import {Sistema} from '../../../model/sistema';
import {NgForm} from '@angular/forms';

@Component({
  selector: 'app-busca-sistema',
  templateUrl: './busca-sistema.component.html',
  styleUrls: ['./busca-sistema.component.css']
})
export class BuscaSistemaComponent implements OnInit {
  sistemaObj = new Sistema();
  resultadoSistemas: Sistema[] = [];
  errosValidacao = null;
  paginaAtual: number = 1;

  constructor(private sistema: SistemaService) {
  }

  ngOnInit(): void {

  }

  buscarDados(form: NgForm) {
    this.errosValidacao = null;
    this.sistema.getListaSistemas(this.sistemaObj).subscribe(data => {
      console.info(data);
      this.resultadoSistemas = data;
    }, error => {
      console.info(error);
      this.resultadoSistemas = [];
      this.errosValidacao = error.error;
    });
  }
  resetarPesquisa() {
    this.sistemaObj = new Sistema();
    this.resultadoSistemas = [];
  }
}
