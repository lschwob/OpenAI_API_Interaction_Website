@extends('layouts.mail_layout')

@section('content')
    <!-- <div class="flex flex-col items-center justify-center h-screen text-white">
        <div class="container mx-auto mt-16 bg-red-600 h-container w-container rounded-3xl">
            <h1 class="text-4xl text-center border-b-2 p-8">Mail Writer</h1>
        </div>
        
    </div> -->
    <section class="mt-12">
            <div class="form-box shadow-2xl shadow-blue-900 border-2 border-gray-600">
                <form method='POST' action="">
                    @csrf
                    <h2>Email Writer</h2>
                    <div class="box1">
                        <textarea class="text1" name="message" id="prompt" placeholder="Entrez votre prompt..." required></textarea>
                        <button type="submit" onclick="loading()">Génerer</button>
                    </div>
                    <div class="box1-5">
                        <div class="checkbox_container">
                            <div>
                                <label>
                                    <input type="checkbox" name="Professionnel">
                                    <span>Professionnel</span>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="Amical">
                                    <span>Amical</span>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="Convaincant">
                                    <span>Convaincant</span>
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="Joyeux">
                                    <span>Joyeux</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box2">
                        <textarea class="text2 bg-gray-600" name="generated" readonly></textarea>
                    </div>
                </form>
                
            </div>
    </section>
@endsection