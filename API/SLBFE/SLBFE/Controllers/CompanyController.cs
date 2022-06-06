using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using SLBFE.Models;
using SLBFE.Repositories;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Controllers
{
    [Route("api/company")]
    [ApiController]
    public class CompanyController : ControllerBase
    {

        private readonly ICompanyRepository _companyRepository;

        public CompanyController(ICompanyRepository companyRepository)
        {
            _companyRepository = companyRepository;
        }

        /* For get all company */
        [Authorize]
        [HttpGet]
        public IEnumerable<Company> GetCompanys()
        {
            return _companyRepository.GetCompanys().ToList();
        }

        /* For get company details */
        [Authorize]
        [HttpGet("{id}")]
        public ActionResult<Company> GetCompany(int id)
        {
            var company = _companyRepository.GetCompany(id);
            if (company is null) return NotFound(new { message = "Not Found" });
            return company;
        }

        /* For insert company */
        [HttpPost("")]
        public ActionResult<Company> AddCompany(Company company)
        {
            var companys = _companyRepository.GetCompanyByEmail(company.Email);
            if (companys is not null) return Conflict(new { message = "Email exists" });

            _companyRepository.AddCompany(company);
            return Created(nameof(GetCompany), new { message = "Resister successfull" });
        }

        /* For update company details */
        [Authorize]
        [HttpPut("{id}")]
        public ActionResult<Company> UpdateCompany(int id, Company company)
        {
            var companys = _companyRepository.GetCompany(id);
            if (companys is null) return NotFound(new { message = "Not Found" });

            companys.Contacts = company.Contacts;
            companys.Name = company.Name;
            companys.Since = company.Since;
            companys.Address = company.Address;

            _companyRepository.UpdateCompany(companys);
            return Ok(new { message = "Update successfull" });
        }

        /* For update company psw */
        [Authorize]
        [HttpPut("{id}/psw")]
        public ActionResult<Company> UpdateCompanyPsw(int id, Company company)
        {
            var companys = _companyRepository.GetCompany(id);
            if (companys is null) return NotFound(new { message = "Not Found" });

            companys.Password = company.Password;

            _companyRepository.UpdateCompany(companys);
            return Ok(new { message = "Update successfull" });
        }

        /* For delete company details */
        [Authorize]
        [HttpDelete("{id}")]
        public ActionResult<Company> DeleteCompany(int id)
        {
            var companys = _companyRepository.GetCompany(id);
            if (companys is null) return NotFound(new { message = "Not Found" });

            _companyRepository.DeleteCompany(companys);
            return Ok(new { message = "Remove successfull" });
        }

    }
}
