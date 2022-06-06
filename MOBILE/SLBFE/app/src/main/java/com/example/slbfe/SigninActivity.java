package com.example.slbfe;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class SigninActivity extends AppCompatActivity {

    private EditText txtEmail, txtPsw;
    private TextView textSignUp;
    private Button btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signin);

        txtEmail = (EditText) this.findViewById(R.id.txtEmail);
        txtPsw = (EditText) this.findViewById(R.id.txtPsw);

        textSignUp = (TextView) this.findViewById(R.id.textSignUp);
        btnLogin = (Button) this.findViewById(R.id.btnLogin);

        textSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(SigninActivity.this, SignupActivity.class);
                startActivity(intent);
//                finish();

            }
        });

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(SigninActivity.this, DashboardActivity.class);
                startActivity(intent);
                finish();

            }
        });

    }
}