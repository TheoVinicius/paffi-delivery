import { LojaService } from './../loja.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';
import { AngularFireStorage } from '@angular/fire/storage';
import { FormBuilder } from '@angular/forms';
import { MessageService } from 'primeng/api';

@Component({
  selector: 'app-loja',
  templateUrl: './loja.component.html',
  styleUrls: ['./loja.component.css']
})
export class LojaComponent implements OnInit {
  public loja: any = {};
  public produtos: any = [];
  constructor(
    private AuthS: AuthService,
    private lojaSer: LojaService,
    private router: Router,
    private http: HttpClient,
  ) { }

  ngOnInit() {

    // Verifica se o usuário está logado
    this.AuthS.pegaUsuarioAtual().then((dado) => {
      if (dado) {

        // Pega os dados da loja
        this.lojaSer.dadosLoja.subscribe(loja => {
          this.loja = loja;
          this.http.post('http://localhost:3000/buscaLojaProduto',
            { id: this.loja.id_loja })
            .subscribe(produtos => {
              this.produtos = produtos;
            });
        });
      } else {
        this.router.navigate(['']);
      }
    });
  }

}