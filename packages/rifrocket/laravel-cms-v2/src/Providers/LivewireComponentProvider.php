<?php

namespace Rifrocket\LaravelCmsV2\Providers;


use Livewire\Livewire;
use Rifrocket\LaravelCmsV2\Http\Livewire\Auth\LoginComponent;
use Rifrocket\LaravelCmsV2\Http\Livewire\Auth\ForgetPasswordComponent;
use Rifrocket\LaravelCmsV2\Http\Livewire\Authorization\AuthorizationManagerComponent;
use Rifrocket\LaravelCmsV2\Http\Livewire\Media\MediaListComponent;
use Rifrocket\LaravelCmsV2\Http\Livewire\Media\MediaUploaderListComponent;
use Rifrocket\LaravelCmsV2\Http\Livewire\Profile\ProfileComponent;

class LivewireComponentProvider
{
    /**
     *Register package's livewire competent
     */

    public static function adminComponentCollection(){

        // Auth Components
        Livewire::component('livewire.auth.login-component',LoginComponent::class);
        Livewire::component('livewire.auth.forget-password-component',ForgetPasswordComponent::class);

        //Media Components
        Livewire::component('livewire.media.media-list-component',MediaListComponent::class);
        Livewire::component('livewire.media.media-uploader-list-component',MediaUploaderListComponent::class);

        //Authorization Roles and Permissions
        Livewire::component('livewire.authorization.authorization-manager-component',AuthorizationManagerComponent::class);

        //Profile Components
        Livewire::component('livewire.profile.profile-component',ProfileComponent::class);

    }

    public static function frontComponentCollection(){

    }

    public static function universalComponentCollection(){

    }

}
