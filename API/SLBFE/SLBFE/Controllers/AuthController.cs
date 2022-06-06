using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.IdentityModel.Tokens;
using SLBFE.Models;
using SLBFE.Repositories;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http.Json;

namespace SLBFE.Controllers
{
    [Route("api/auth/login")]
    [ApiController]
    public class AuthController : ControllerBase
    {

        private readonly IAuthRepository _authRepository;
        private readonly IConfiguration _configuration;

        public AuthController(IAuthRepository authRepository, IConfiguration configuration)
        {
            _authRepository = authRepository;
            _configuration = configuration;
        }

        // Route for citizen login
        [HttpPost("citizen")]
        public ActionResult<Citizen> CitizenLogin(Citizen citizen)
        {

            var citiz = _authRepository.CitizenLogin(citizen);
            if (citiz is null) return NotFound(new { message = "Not Found" });

            // Create JWT token
            var authSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_configuration["JWT:SecretKey"]));
            var token = new JwtSecurityToken(
                issuer: _configuration["JWT:ValidIssuer"],
                audience: _configuration["JWT:ValidAudience"],
                expires: DateTime.Now.AddHours(10),
                signingCredentials: new SigningCredentials(authSigningKey, SecurityAlgorithms.HmacSha256)
            );

            return Ok(new
            {
                token = new JwtSecurityTokenHandler().WriteToken(token),
                expiration = token.ValidTo,
                type = "citizen",
                nid = citiz.NationalId,
                message = "Authentication successfull"
            });

        }

        // Route for officer login
        [HttpPost("officer")]
        public ActionResult<Officer> OfficerLogin(Officer officer)
        {
            var officers = _authRepository.OfficerLogin(officer);
            if (officers is null) return NotFound(new { message = "Not Found" });

            // Create JWT token
            var authSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_configuration["JWT:SecretKey"]));
            var token = new JwtSecurityToken(
                issuer: _configuration["JWT:ValidIssuer"],
                audience: _configuration["JWT:ValidAudience"],
                expires: DateTime.Now.AddHours(10),
                signingCredentials: new SigningCredentials(authSigningKey, SecurityAlgorithms.HmacSha256)
            );

            return Ok(new
            {
                token = new JwtSecurityTokenHandler().WriteToken(token),
                expiration = token.ValidTo,
                type = "officer",
                nid = officers.NationalId,
                message = "Authentication successfull"
            });

        }

        // Route for company login
        [HttpPost("company")]
        public ActionResult<Company> CompanyLogin(Company company)
        {
            var companys = _authRepository.CompanyLogin(company);
            if (companys is null) return NotFound(new { message = "Not Found" });

            // Create JWT token
            var authSigningKey = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_configuration["JWT:SecretKey"]));
            var token = new JwtSecurityToken(
                issuer: _configuration["JWT:ValidIssuer"],
                audience: _configuration["JWT:ValidAudience"],
                expires: DateTime.Now.AddHours(10),
                signingCredentials: new SigningCredentials(authSigningKey, SecurityAlgorithms.HmacSha256)
            );

            return Ok(new
            {
                token = new JwtSecurityTokenHandler().WriteToken(token),
                expiration = token.ValidTo,
                type = "company",
                nid = companys.CompanyId,
                message = "Authentication successfull"
            });

        }


    }
}
