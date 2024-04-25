<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-ezfkL5HFb8VO1QFtH4tUwbiRpPbyiZhZ4I1W9DI9NXIv6fuHeMwAEdmP7FGUmNG3" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"
    integrity="sha384-pzjw8L/7CJEYKFotixk1f1vFA5l0S+G/JnLZ9LTV9EnxgyNcLXRScX3QpF1aPQ" crossorigin="anonymous">
<style>
    html {
        scroll-behavior: smooth;
    }

    ::-webkit-scrollbar {
        width: 10px;
        border-radius: 50px;
    }

    ::-webkit-scrollbar-track {
        background: #EDF3F9;
    }

    ::-webkit-scrollbar-thumb {
        background: #EDF3F9;
        border-radius: 30px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #2DACF3;
    }

    .search-input {
        width: 33%;
    }

    .swal2-title {
        color: #333;
    }

    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }

    .navbar-dropdown {
        border-radius: 20px;
    }

    .form-input {
        padding: 5px;
        border: 2px solid #0090e7;
        border-radius: 5px;
    }

    .form-input:focus {
        padding: 5px;
        border: 2px solid #2DACF3;
        border-radius: 5px;
    }

    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background: rgba(0, 0, 0, 0);
        color: #4E5155;
    }

    label.btn {
        margin-bottom: 0;
    }

    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }

    .btn {
        cursor: pointer;
    }

    .text-light {
        color: #fff !important;
    }

    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background: #3B5998;
        color: #fff;
    }

    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background: #000;
        color: #fff;
    }

    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .row-bordered {
        overflow: hidden;
    }

    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }

    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }

    .account-settings-multiselect~.select2-container {
        width: 100% !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }

    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    #tabel-data thead {
        color: #000000;
    }

    .custom-btn {
        padding: 10px 15px;
    }

    .table thead tr {
        border-bottom: 2px solid white;
    }

    .icon-btn {
        padding: 5px;
    }

    .text-primary {
        margin-right: 5px;
    }

    .btn i {
        color: #ffffff;
        margin-left: 5px;
    }

    .icon-btn i {
        font-size: 14px;
        margin: 0 auto;
    }

    #brand-logo-mini {
        width: 45px;
        height: 100%;
    }

    #brand-logo {
        width: 150px;
        height: 100%;
    }

    #icon-item {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }

    @media only screen and (max-width: 900px) {
        .btn .text-light {
            display: none;
        }
    }
</style>