@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
            <div class="alert alert-danger">
                <h4>{{$errors->first()}}</h4>
            </div>
            @endif
            @if(isset($success))
            <div class="alert alert-success text-center">
                <h4>{{$success}}</h4>
            </div>
            @endif
            @if(isset($errors2))
            <div class="alert alert-danger text-center">
                <h4>{{$errors2}}</h4>
            </div>
            @endif
            <div class="card">
                <div class="card-header" style="background-color:#009999; color:white;">{{ __('Demander un document') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('verify') }}" enctype='multipart/form-data' class="bg-white">
                        @csrf

                        <div class="row mb-3">
                            <label for="codeApogee" class="col-md-4 col-form-label text-md-end">{{ __("Code Apogée") }}</label>

                            <div class="col-md-6">
                                <input style="border-radius:25px" id="codeApogee" placeholder="X00000000" type="text" class="form-control @error('codeApogee') is-invalid @enderror" name="codeApogee"  required>

                                @error('codeApogee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="emailStudent" class="col-md-4 col-form-label text-md-end">{{ __('E_mail') }}</label>

                            <div class="col-md-6">
                                <input style="border-radius:25px" id="emailStudent" type="email" placeholder="xxxxx@xxxx.com" class="form-control @error('emailStudent') is-invalid @enderror" name="emailStudent"  required>

                                @error('emailStudent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cne" class="col-md-4 col-form-label text-md-end">{{ __('CNE') }}</label>

                            <div class="col-md-6">
                                <input style="border-radius:25px" id="cne" type="text" placeholder="X000000" class="form-control @error('cne') is-invalid @enderror" name="cne"  required>
                                @error('cne')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <p style="color: red; text-align: center;" id="nonEtudiant"></p>
                        <div class="row mb-3 d-none" id="radio">
                            <label for="choix" class="col-md-4 col-form-label text-md-end">{{ __('Votre demande concerne') }}</label>

                            <div class="col-md-6">
                                <select name="choix">
                                    <option value="" disabled selected hidden>Choisissez-vous</option>
                                    <option value="releveNote" id="releveNote">Relevé de notes</option>
                                    <option value="attestaScolarite" id="attestaScolarite">Attestation de scolarité</option>
                                    <option value="conventionDeStage" id="conventionDeStage">Convention de stage</option>
                                </select>
                               
                                @error('choix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="conventionStage d-none">
                            <div class="row mb-3">
                                <label for="companyName" class="col-md-4 col-form-label text-md-end">{{ __('Nom Entreprise') }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="companyName" type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName">
                                    @error('companyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="encadrantName" class="col-md-4 col-form-label text-md-end">{{ __('Nom Encadrant') }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="encadrantName" type="text" class="form-control @error('encadrantName') is-invalid @enderror" name="encadrantName" >
                                    @error('encadrantName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="encadrantNameSchool" class="col-md-4 col-form-label text-md-end">{{ __("Nom Encadrant de l'école") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="encadrantNameSchool" type="text" class="form-control @error('encadrantNameSchool') is-invalid @enderror" name="encadrantNameSchool" >
                                    @error('encadrantNameSchool')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="director" class="col-md-4 col-form-label text-md-end">{{ __("Directeur de l'entreprise") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="director" type="text" class="form-control @error('director') is-invalid @enderror" name="director">
                                    @error('director')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="companyEmail" class="col-md-4 col-form-label text-md-end">{{ __("Email Entreprise") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="companyEmail" type="email" class="form-control @error('companyEmail') is-invalid @enderror" name="companyEmail">
                                    @error('companyEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="logoCompany" class="col-md-4 col-form-label text-md-end">{{ __("Logo de Entreprise") }}</label>
                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="logoCompany" type="file" class="form-control @error('logoCompany') is-invalid @enderror" name="logoCompany">

                                     @error('logoCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="addressCompany" class="col-md-4 col-form-label text-md-end">{{ __("Adresse Entreprise") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="addressCompany" type="text" class="form-control @error('addressCompany') is-invalid @enderror" name="addressCompany" >
                                    @error('addressCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telCompany" class="col-md-4 col-form-label text-md-end">{{ __("Tel Entreprise") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="telCompany" type="text" class="form-control @error('telCompany') is-invalid @enderror" name="telCompany" >
                                    @error('telCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="assistantPedag" class="col-md-4 col-form-label text-md-end">{{ __("Assistant Pédagogique") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="assistantPedag" type="text" class="form-control @error('assistantPedag') is-invalid @enderror" name="assistantPedag" >
                                    @error('assistantPedag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stageTheme" class="col-md-4 col-form-label text-md-end">{{ __("Thème de stage") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="stageTheme" type="text" class="form-control @error('stageTheme') is-invalid @enderror" name="stageTheme" >
                                    @error('stageTheme')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="startDate" class="col-md-4 col-form-label text-md-end">{{ __("Date Début") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="startDate" type="date" class="form-control @error('startDate') is-invalid @enderror" name="startDate" >
                                    <p style="color: red" id="erreurDateS"></p>
                                    @error('startDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="endDate" class="col-md-4 col-form-label text-md-end">{{ __("Date Fin") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="endDate" type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate" >
                                    <p style="color: red" id="erreurDateE"></p>
                                    @error('endDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="accordCompany" class="col-md-4 col-form-label text-md-end ">{{ __("Accord Entreprise") }}</label>
                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="accordCompany" type="file" class="form-control @error('accordCompany') is-invalid custom-file-label @enderror" name="accordCompany" >

                                    @error('accordCompany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="border-radius:25px" for="assurance" class="col-md-4 col-form-label text-md-end form-label">{{ __("Assurance") }}</label>

                                <div class="col-md-6">
                                    <input style="border-radius:25px" id="assurance" type="file" class="form-control @error('assurance') is-invalid @enderror" name="assurance" >
                                    @error('assurance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="releveNote d-none">
                            <div class="row mb-3">
                                <label for="niveau" class="col-md-4 col-form-label text-md-end">{{ __("Niveau") }}</label>

                                <div class="col-md-6">
                                    <select id="niveau" name="niveau" class="niveauD">
                                    <option value="" disabled selected hidden>Choisissez-vous</option>
                                    </select>
                                    @error('niveau')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" value="" id="anneeUnivR" class="d-none" name="anneeUnivR">
                            <div class="row mb-3" id="semestre">
                                <label for="semestre" class="col-md-4 col-form-label text-md-end">{{ __('Semestre') }}</label>
                                <div class="col-md-6" id="allSemesters">
                                    <select name="semestre" id="allSemesters">
                                        <option value="" disabled selected >Choisissez-vous</option>
                                        <option id="semestre1" class="d-none" value="1">Semestre 1</option>
                                        <option id="semestre2" class="d-none" value="2">Semestre 2</option>
                                        <option id="tous" class="d-none" value="0">Les deux</option>
                                    </select>
                                   
                                    @error('semestre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>


                        <div class="attestationSchool d-none">
                            <div class="row mb-3">
                                <label for="niveauA" class="col-md-4 col-form-label text-md-end">{{ __("Niveau") }}</label>

                                <div class="col-md-6">
                                    <select id="niveauA" name="niveauA" class="niveauD">
                                    <option value="" disabled selected hidden>Choisissez-vous</option>
                                    </select>
                                    @error('niveauA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" value="" id="anneeUnivA" class="d-none" name="anneeUnivA">
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4" id ="divbtn">
                                <button style="border-radius:25px; background-color:#009999; " type="submit" class="btn btn-primary mt-auto mr-auto" id="submit" disabled>
                                    {{ __('Envoyer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection