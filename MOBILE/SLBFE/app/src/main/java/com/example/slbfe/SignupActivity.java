package com.example.slbfe;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class SignupActivity extends AppCompatActivity {

    private EditText name, age, email, address, contact, nic, profession, affiliation, qualifications, latitude, longitude, psw, cpsw;
    private TextView textLogin;
    private Button btnSignUp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);

        name = (EditText) this.findViewById(R.id.name);
        age = (EditText) this.findViewById(R.id.age);
        email = (EditText) this.findViewById(R.id.email);
        address = (EditText) this.findViewById(R.id.address);
        contact = (EditText) this.findViewById(R.id.contact);
        nic = (EditText) this.findViewById(R.id.nic);
        profession = (EditText) this.findViewById(R.id.profession);
        affiliation = (EditText) this.findViewById(R.id.affiliation);
        qualifications = (EditText) this.findViewById(R.id.qualifications);
        latitude = (EditText) this.findViewById(R.id.latitude);
        longitude = (EditText) this.findViewById(R.id.longitude);
        psw = (EditText) this.findViewById(R.id.psw);
        cpsw = (EditText) this.findViewById(R.id.cpsw);

        textLogin = (TextView) this.findViewById(R.id.textLogin);
        btnSignUp = (Button) this.findViewById(R.id.btnSignUp);

        textLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(SignupActivity.this, SigninActivity.class);
                startActivity(intent);
//                finish();

            }
        });

        btnSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(SignupActivity.this, DashboardActivity.class);
                startActivity(intent);
                finish();

            }
        });

    }
}