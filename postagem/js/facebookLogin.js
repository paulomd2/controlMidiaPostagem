window.fbAsyncInit = function () {
    FB.init({
        appId: '640961876010371',
        xfbml: true,
        version: 'v2.3',
        cookie: true,
        xfbml: true,
    });

    checkLoginState()
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome! Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                console.log(response);
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'public_profile,email,manage_pages,publish_actions'}
    );
}
function checkLoginState() {
    userid = '';
    accessToken = '';

    FB.getLoginStatus(function (response) {
        if (response.status !== 'connected') {
            login();
        } else {
            userid = response.authResponse.userID;
            accessToken = response.authResponse.accessToken;

            console.log('ID: ' + userid + ' token: ' + accessToken);


            return response.authResponse.accessToken;
        }
    });

    FB.api("/{page-id}",
    function (response) {
        console.log(response);
        
        if (response && !response.error) {
            /* handle the result */
        }
    });

}

function logout() {
    FB.logout(function (response) {
        // user is now logged out
    });
}