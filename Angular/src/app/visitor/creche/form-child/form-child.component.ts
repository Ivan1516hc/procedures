import { Component } from '@angular/core';
import { FormArray, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { CrecheService } from '../../services/creche.service';

@Component({
  selector: 'app-form-child',
  templateUrl: './form-child.component.html',
  styleUrls: ['./form-child.component.css']
})
export class FormChildComponent {

  constructor(private fb: FormBuilder, private crecheService: CrecheService) { }

  miFormulario: FormGroup = this.fb.group({
    curp: ['HECB000817HMNRSNA5',[Validators.required]],
    nombre: ['',[Validators.required]],
    apaterno: ['',[Validators.required]],
    amaterno: ['',[Validators.required]],

    fechanacimiento: ['',[Validators.required]],
    edad: ['',[Validators.required]],
    sexo: ['',[Validators.required]],

    tipo_sangre: ['',[Validators.required]],
    calle: ['',[Validators.required]],
    codigopostal: ['45350',[Validators.required]],
    estado: [{value: '', disabled: true},[Validators.required]],
    municipio: [{value: '', disabled: true},[Validators.required]],
    numext: ['',[Validators.required]],
    numint: ['',[Validators.nullValidator]],
    primercruce: ['',[Validators.nullValidator]],
    segundocruce: ['',[Validators.nullValidator]],
    colonia: ['',[Validators.required]],

    celular: ['',[Validators.required]],

    enfermedad: ['',[Validators.nullValidator]],
    enfermedad_otro: ['',[Validators.nullValidator]],

    hermanos_en_CDI: new FormArray([
      new FormGroup({
        curp: new FormControl(''),
      })
    ])
  });
  curp: boolean;
  postalCode: boolean;
  suburbs : any = null;
  selectsDisabled: boolean=true;


  get hermanos_en_CDI(): FormArray {
    return this.miFormulario.get('hermanos_en_CDI') as FormArray;
  }

  validatorCurp() {
    this.crecheService.fetchCurp(this.miFormulario.value.curp).subscribe({
      next: (response) => {
        if (response.id) {
          this.curp = true;
          this.miFormulario.patchValue({
            nombre: response.nombre,
            amaterno: response.amaterno,
            apaterno: response.apaterno,
            curp: response.curp,
            sexo: response.sexo,

            edad: response.edad,
            fechanacimiento: response.fechanacimiento,

            calle: response.calle,
            codigopostal: response.codigopostal,
            estado: response.estado,
            municipio: response.municipio,
            numext: response.numext,
            numint: response.numint,
            primercruce: response.primercruce,
            segundocruce: response.segundocruce,
            colonia: response.colonia,

            celular: response.celular,

            enfermedad: response.enfermedad,
            enfermedad_otro: response.enfermedad_otro,
          });
        } else if (response.nombre){
          this.curp = true;
          this.miFormulario.patchValue({
            curp: response.curp,
            nombre: response.nombre,
            apaterno: response.apaterno,
            amaterno: response.amaterno,
            fechanacimiento: response.fechanacimiento,
            edad: response.edad,
            sexo: response.sexo,
            calle: '',
            // codigopostal: '',
            estado: '',
            municipio: '',
            numext: '',
            numint: '',
            primercruce: '',
            segundocruce: '',
            colonia: '',
            celular: '',
            enfermedad: '',
            enfermedad_otro: '',
          })
        }
      }, error: (error) => {
        console.log(error);
        this.hayError = true;
      }
    })
  }

  validatorPostCode(){
    this.crecheService.getPostalCodeInfo(this.miFormulario.value.codigopostal).subscribe({
      next: (response) => {
        if (response[0].id) {
          this.postalCode = true;
          this.miFormulario.patchValue({
            municipio: response[0].municipio,
            estado: response[0].estado,
          });
          this.suburbs = response;
        }
      }, error: (error) => {
        console.log(error);
        this.hayError = true;
      }
    })
  }

  addHermano() {
    this.hermanos_en_CDI.push(
      new FormGroup({
        curp: new FormControl(''),
      })
    )
  }

  deleteHermano() {

  }

  ngOnInit(): void {
    this.initTable();
  }
  hayError: boolean = false;
  diseases: any = null;

  private initTable() {
    this.crecheService.getCatalogs().subscribe({
      next: (catalogs) => {
        this.diseases = catalogs.enfermedad;
      }, error: () => {
        this.hayError = true;
      }
    });
  }

  onSubmit() {

  }
}
