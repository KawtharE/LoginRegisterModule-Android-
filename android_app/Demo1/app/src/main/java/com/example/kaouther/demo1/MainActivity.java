package com.example.kaouther.demo1;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends Activity {

    private static final String TAG = MainActivity.class.getSimpleName();
    private TextView txtEmail;
    private Button btnLogout;
    static String userEmail;
    private SessionManager session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        txtEmail = (TextView) findViewById(R.id.mail);
        btnLogout = (Button) findViewById(R.id.btnLogout);
        // session manager
        session = new SessionManager(getApplicationContext());
        Intent intent = getIntent();
        userEmail = intent.getStringExtra(LoginActivity.Email);
        txtEmail.setText(userEmail);

        // Logout button click event
        btnLogout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                logoutUser();
            }
        });
    }
    private void logoutUser() {
        session.setLogin(false);
        // Launching the login activity
        Intent intent = new Intent(MainActivity.this, LoginActivity.class);
        startActivity(intent);
        finish();
        overridePendingTransition(R.anim.push_left_in, R.anim.push_left_out);

    }
    @Override
    protected void onStart(){
        super.onStart();
        Intent intent = getIntent();
        userEmail = intent.getStringExtra(LoginActivity.Email);
        txtEmail.setText(userEmail);

    }

    @Override
    protected void onRestart(){
        super.onRestart();
        Intent intent = getIntent();
        userEmail = intent.getStringExtra(LoginActivity.Email);
        txtEmail.setText(userEmail);

    }
}
