import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {CadastroSistemaComponent} from './component/sistema/cadastro-sistema/cadastro-sistema.component';
import {BuscaSistemaComponent} from './component/sistema/busca-sistema/busca-sistema.component';


const routes: Routes = [
  {path: 'sistema/busca', component: BuscaSistemaComponent},
  {path: 'sistema/cadastro', component: CadastroSistemaComponent},
  {path: 'sistema/cadastro/:idSistema', component: CadastroSistemaComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
