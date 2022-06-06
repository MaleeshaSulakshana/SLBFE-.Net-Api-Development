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
    [Route("api/officer")]
    [ApiController]
    public class OfficerController : ControllerBase
    {

        private readonly IOfficerRepository _officerRepository;

        public OfficerController(IOfficerRepository officerRepository)
        {
            _officerRepository = officerRepository;
        }

        /* For get all officer */
        [Authorize]
        [HttpGet]
        public IEnumerable<Officer> GetOfficers()
        {
            return _officerRepository.GetOfficers().ToList();
        }

        /* For get officer details */
        [Authorize]
        [HttpGet("{nid}")]
        public ActionResult<Officer> GetOfficer(string nid)
        {
            var officer = _officerRepository.GetOfficer(nid);
            if (officer is null) return NotFound(new { message = "Not Found" });
            return officer;
        }

        /* For insert officer */
        [Authorize]
        [HttpPost("")]
        public ActionResult<Officer> AddOfficer(Officer officer)
        {
            var officers = _officerRepository.GetOfficerByEmail(officer.Email);
            if (officers is not null) return Conflict(new { message = "Email exists" });

            _officerRepository.AddOfficer(officer);
            return Created(nameof(GetOfficer), new { message = "Resister successfull" });
        }

        /* For update officer details */
        [Authorize]
        [HttpPut("{nid}")]
        public ActionResult<Officer> UpdateOfficer(string nid, Officer officer)
        {
            var officers = _officerRepository.GetOfficer(nid);
            if (officers is null) return NotFound(new { message = "Not Found" });

            officers.Contacts = officer.Contacts;
            officers.Name = officer.Name;
            officers.Position = officer.Position;

            _officerRepository.UpdateOfficer(officers);
            return Ok(new { message = "Update successfull" });
        }

        /* For update officer psw */
        [Authorize]
        [HttpPut("{nid}/psw")]
        public ActionResult<Officer> UpdateOfficerPsw(string nid, Officer officer)
        {
            var officers = _officerRepository.GetOfficer(nid);
            if (officers is null) return NotFound(new { message = "Not Found" });

            officers.Password = officer.Password;

            _officerRepository.UpdateOfficer(officers);
            return Ok(new { message = "Update successfull" });
        }

        /* For delete officer details */
        [Authorize]
        [HttpDelete("{nid}")]
        public ActionResult<Officer> DeleteOfficer(string nid)
        {
            var officers = _officerRepository.GetOfficer(nid);
            if (officers is null) return NotFound(new { message = "Not Found" });

            _officerRepository.DeleteOfficer(officers);
            return Ok(new { message = "Remove successfull" });
        }

    }
}
