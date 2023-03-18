<body>
<script type="text/javascript">
var configuration = {
    widgetId: "336361764365313931373932",
    tokenAuth: "391621Tk3nnQ8l63ff846bP1",
    success: (data) => {
        // get verified token in response
        console.log('success response', data);
    },
    failure: (error) => {
        // handle error
        console.log('failure reason', error);
    }
};
</script>
<script type="text/javascript" onload="initSendOTP(configuration)" src="https://control.msg91.com/app/assets/otp-provider/otp-provider.js"> </script>
</body>


