import {Injectable} from '@angular/core';
import {HttpClient, HttpParams} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Sistema} from '../model/sistema';
import {environment} from '../../environments/environment';
import {catchError, map, retry} from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class SistemaService {

  constructor(private http: HttpClient) {
  }

  getListaSistemas(sistemaObj) {
    let searchParams = new HttpParams();
    if (sistemaObj.descricaoSistema) {
      searchParams = searchParams.append('descricaoSistema', sistemaObj.descricaoSistema);
    }
    if (sistemaObj.siglaSistema) {
      searchParams = searchParams.append('siglaSistema', sistemaObj.siglaSistema);
    }
    if (sistemaObj.emailSistema) {
      searchParams = searchParams.append('emailSistema', sistemaObj.emailSistema);
    }

    return this.http.get<Sistema>(environment.api + 'sistema',
      {
        params: searchParams
      })
      .pipe(
        map (responseData => {
          const sistemasArray: Sistema[] = [];
          for (const key in responseData) {
            sistemasArray.push(responseData[key]);
          }
          return sistemasArray;
        })
      );
  }

  cadastrarSistema(sistema): Observable<any> {

    return this.http.post<any>(environment.api + 'sistema', sistema);
  }

  getSistema(idSistema): Observable<any> {
    return this.http.get<any>(environment.api + 'sistema/' + idSistema);
  }
}

