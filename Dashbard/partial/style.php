<style>

    .review-form .input {
        margin-bottom: 15px;
    }

    .review-form .input-rating {
        margin-bottom: 15px;
    }

    .review-form .input-rating .stars {
        display: inline-block;
        vertical-align: top;
    }

    .review-form .input-rating .stars input[type="radio"] {
        display: none;
    }

    .review-form .input-rating .stars>label {
        float: right;
        cursor: pointer;
        padding: 0px 3px;
        margin: 0px;
    }

    .review-form .input-rating .stars>label:before {
        content: "\f006";
        font-family: FontAwesome;
        color: #E4E7ED;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .review-form .input-rating .stars>label:hover:before, .review-form .input-rating .stars>label:hover~label:before {
        color: #D10024;
    }

    .review-form .input-rating .stars>input:checked label:before, .review-form .input-rating .stars>input:checked~label:before {
        content: "\f005";
        color: #D10024;
    }


    .primary-btn {
        display: inline-block;
        padding: 12px 30px;
        background-color: #D10024;
        border: none;
        border-radius: 40px;
        color: #FFF;
        text-transform: uppercase;
        font-weight: 700;
        text-align: center;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .primary-btn:hover, .primary-btn:focus {
        opacity: 0.9;
        color: #FFF;
    }

    .star-size{
        font-size: 20px;
    }


</style>