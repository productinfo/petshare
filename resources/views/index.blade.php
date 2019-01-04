@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>WELCOME TO PETSHARE.COM</h1>

        <div class="my-4 align-content-center">
            <img style="width:49%" src="{{ asset('images/dog.jpg') }}" class="rounded-circle img-fluid d-inline" alt="Pet" />
            <img style="width:49%;position: relative;left:-7.5rem;" src="{{ asset('images/pet-lover.jpg') }}" class="rounded-circle img-fluid d-inline" alt="Pet" />
        </div>

        <p>Have more happiness in your life and an animal's life!</p>

        <p>Do you an animal lover but don't have one yourself? &nbsp;  Do you have a pet that loves to play,
            go on walks, etc. - more than you have the time and energy to give? &nbsp; Let's make a "win-win" deal.</p>

        <p>If you're a pet-less human, create an account, search for the type of animal you're interested in,
            and contact the owner about arraigning a pet play date.</p>

        <p>If you're a pet owner, create an account, create a profile for your pet, message with the animal lovers that contact you, and set up pet play dates.</p>

        <p>Happiness, smiles and love!</p>

        <small><a class="text-black-50" target="_blank"  href="https://www.pexels.com/photo/woman-wearing-yellow-button-up-long-sleeved-dress-shirt-774095/">Dog photo by bruce mars from Pexels</a>
            &nbsp;&nbsp;
            <a class="text-black-50" target="_blank" href="https://www.pexels.com/photo/adorable-animal-animal-photography-beagle-452772/">Woman photo by Artem Bali from Pexels</a>
        </small>

    </div>

@endsection