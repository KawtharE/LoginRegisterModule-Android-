package com.example.kaouther.demo1;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.RelativeLayout;

public class StartActivity extends Activity implements View.OnClickListener{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_start);
        RelativeLayout layout = (RelativeLayout) findViewById(R.id.activity_start);
        layout.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        Intent i =new Intent(StartActivity.this, LoginActivity.class);
        startActivity(i);
        finish();
    }
}
