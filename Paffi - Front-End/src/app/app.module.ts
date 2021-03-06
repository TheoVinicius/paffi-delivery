import { DialogModule } from 'primeng/dialog';
import { RouterModule } from '@angular/router';
import { CadastroComponent } from './cadastro/cadastro.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { NavbarComponent } from './navbar/navbar.component';
import { ButtonModule } from 'primeng/button';
import { HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AngularFireModule } from '@angular/fire';
import { AngularFireAuth } from '@angular/fire/auth';
import { LoginComponent } from './login/login.component';
import { ToastModule } from 'primeng/toast';
import { MessageService } from 'primeng/components/common/messageservice';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { DropdownModule } from 'primeng/dropdown';
import { ScrollingModule } from '@angular/cdk/scrolling';
import { HomeComponent } from './home/home.component';
import { FileUploadModule } from 'primeng/fileupload';
import { MinhaLojaComponent } from './minha-loja/minha-loja.component';
import { AngularFireStorageModule } from '@angular/fire/storage';
import { InputTextareaModule } from 'primeng/inputtextarea';
import { ConfirmDialogModule } from 'primeng/confirmdialog';
import { ConfirmationService } from 'primeng/api';
import { SidebarModule } from 'primeng/sidebar';
import { LojaComponent } from './loja/loja.component';
import { PerfilComponent } from './perfil/perfil.component';
import { ScrollPanelModule, ScrollPanel } from 'primeng/scrollpanel';
import { AngularFirestoreModule } from '@angular/fire/firestore';
import { CarrinhoComponent } from './carrinho/carrinho.component';
import { VendasComponent } from './vendas/vendas.component';
import {OverlayPanelModule} from 'primeng/overlaypanel';
import {TabViewModule} from 'primeng/tabview';
import {ChartModule} from 'primeng/chart';
import {InputSwitchModule} from 'primeng/inputswitch';


export const firebaseConfig = {
  apiKey: 'AIzaSyCU162xBGghRaszmRllu4c9JdtzakJJyzM',
  authDomain: 'paffi-tcc.firebaseapp.com',
  databaseURL: 'https://paffi-tcc.firebaseio.com',
  projectId: 'paffi-tcc',
  storageBucket: 'paffi-tcc.appspot.com',
  messagingSenderId: '90869128650',
  appId: '1:90869128650:web:9fc2c7c03513c6de'
};

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    MinhaLojaComponent,
    CadastroComponent,
    LoginComponent,
    HomeComponent,
    LojaComponent,
    PerfilComponent,
    CarrinhoComponent,
    VendasComponent
  ],
  imports: [
    AngularFireModule.initializeApp(firebaseConfig),
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ButtonModule,
    FormsModule,
    ReactiveFormsModule,
    ToastModule,
    BrowserAnimationsModule,
    DropdownModule,
    ScrollingModule,
    FileUploadModule,
    RouterModule,
    DialogModule,
    AngularFireStorageModule,
    InputTextareaModule,
    ConfirmDialogModule,
    SidebarModule,
    ScrollPanelModule,
    AngularFirestoreModule,
    OverlayPanelModule,
    TabViewModule,
    ChartModule,
    InputSwitchModule
  ],
  providers: [
    MessageService,
    AngularFireAuth,
    ConfirmationService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
