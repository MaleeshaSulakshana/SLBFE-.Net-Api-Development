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
    [Route("api/citizens")]
    [ApiController]
    public class CitizensController : ControllerBase
    {

        private readonly ICitizenRepository _citizenRepository;

        public CitizensController(ICitizenRepository citizenRepository)
        {
            _citizenRepository = citizenRepository;
        }

        /* For get all citizens */
        [Authorize]
        [HttpGet]
        public IEnumerable<Citizen> GetCitizens()
        {
            return _citizenRepository.GetCitizens().ToList();
        }

        /* For get citizen details */
        [Authorize]
        [HttpGet("{nid}")]
        public ActionResult<Citizen> GetCitizen(string nid)
        {
            var citiz =  _citizenRepository.GetCitizen(nid);
            if (citiz is null) return NotFound(new { message = "Not Found" });
            return citiz;
        }

        /* For get citizen conatct */
        [Authorize]
        [HttpGet("{nid}/contacts")]
        public ActionResult<String> GetCitizenContacts(string nid)
        {
            var citiz = _citizenRepository.GetCitizen(nid);
            if (citiz is null) return NotFound(new { message = "Not Found" });
            return citiz.Contacts;
        }

        /* For get citizens by qualofication */
        [Authorize]
        [HttpGet("find/{qualifications}")]
        public IEnumerable<Citizen> GetCitizensByQualifications(string qualifications)
        {
            return _citizenRepository.GetCitizensByQualifications(qualifications).ToList();
        }

        /* For insert citizen */
        [HttpPost("")]
        public ActionResult<Citizen> AddCitizen(Citizen citizen)
        {
            var citiz = _citizenRepository.GetCitizen(citizen.NationalId);
            if (citiz is not null) return Conflict(new { message = "Email exists" });

            _citizenRepository.AddCitizen(citizen);
            return Created(nameof(GetCitizen), new { message = "Resister successfull" } );
        }

        /* For update citizen details */
        [Authorize]
        [HttpPut("{nid}")]
        public ActionResult<Citizen> UpdateCitizen(string nid, Citizen citizen)
        {
            var citiz = _citizenRepository.GetCitizen(nid);
            if (citiz is null) return NotFound(new { message = "Not Found" });

            citiz.Address = citizen.Address;
            citiz.Affiliation = citizen.Affiliation;
            citiz.Age = citizen.Age;
            citiz.Latitude = citizen.Latitude;
            citiz.Longitude = citizen.Longitude;
            citiz.Name = citizen.Name;
            citiz.Profession = citizen.Profession;
            citiz.Contacts = citizen.Contacts;
            citiz.Qualifications = citizen.Qualifications;

            _citizenRepository.UpdateCitizen(citiz);
            return Ok(new { message = "Update successfull" });
        }

        /* For update citizen psw */
        [Authorize]
        [HttpPut("{nid}/psw")]
        public ActionResult<Citizen> UpdateCitizenPsw(string nid, Citizen citizen)
        {
            var citiz = _citizenRepository.GetCitizen(nid);
            if (citiz is null) return NotFound(new { message = "Not Found" });

            citiz.Password = citizen.Password;

            _citizenRepository.UpdateCitizen(citiz);
            return Ok(new { message = "Update successfull" });
        }

        /* For delete citizen details */
        [Authorize]
        [HttpDelete("{nid}")]
        public ActionResult<Citizen> DeleteCitizen(string nid)
        {
            var citiz = _citizenRepository.GetCitizen(nid);
            if (citiz is null) return NotFound(new { message = "Not Found" });

            _citizenRepository.DeleteCitizen(citiz);
            return Ok(new { message = "Remove successfull" });
        }

    }

}
