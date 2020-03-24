import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {Sistema} from '../../../model/sistema';
import {SistemaService} from '../../../service/sistema.service';
import {toNumbers} from '@angular/compiler-cli/src/diagnostics/typescript_version';

@Component({
  selector: 'app-cadastro-sistema',
  templateUrl: './cadastro-sistema.component.html',
  styleUrls: ['./cadastro-sistema.component.css']
})
export class CadastroSistemaComponent implements OnInit {
  sistemaObj = new Sistema();
  validacao = null;
  validate: boolean = false;
  constructor(private routeActive: ActivatedRoute, private sistema: SistemaService, private router: Router) {
  }

  ngOnInit(): void {
    let idSistema = this.routeActive.snapshot.paramMap.get('idSistema');
    if (idSistema != null) {
      this.sistema.getSistema(idSistema).subscribe(data => {
        this.sistemaObj = data;
      });
    }
  }

  cadastrarSistema() {
    this.validate = false;
    this.validacao = null;
    this.sistemaObj.statusSistema = '1';
    this.sistema.cadastrarSistema(this.sistemaObj).subscribe(data => {
      console.info(data);
      this.validate = data;
      this.novo();
    }, error => {
      this.validacao = error.error;
    });
  }

  novo() {
    this.sistemaObj = new Sistema();
  }
}
