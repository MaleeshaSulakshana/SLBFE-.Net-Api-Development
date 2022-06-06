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
    [Route("api/complain")]
    [ApiController]
    public class ComplainController : ControllerBase
    {

        private readonly IComplainRepository _complainRepository;

        public ComplainController(IComplainRepository complainRepository)
        {
            _complainRepository = complainRepository;
        }

        /* For get complain details */
        [HttpGet("{id}")]
        public ActionResult<Complain> GetComplain(int id)
        {
            var complains = _complainRepository.GetComplain(id);
            if (complains is null) return NotFound(new { message = "Not Found" });
            return complains;
        }

        [HttpGet("citizen/{id}")]
        public IEnumerable<Complain> GetComplainByNid(string id)
        {
            return _complainRepository.GetComplainByNid(id).ToList();
        }

        /* For get all complains */
        [HttpGet]
        public IEnumerable<Complain> GetComplains()
        {
            return _complainRepository.GetComplains().ToList();
        }

        /* For insert complains */
        [HttpPost("")]
        public ActionResult<Complain> AddComplain(Complain complain)
        {
            _complainRepository.AddComplain(complain);
            return Created(nameof(GetComplain), new { message = "Complain added successfull" });
        }

        /* For update complains details */
        [HttpPut("{id}")]
        public ActionResult<Complain> UpdateComplain(int id, Complain complain)
        {
            var complains = _complainRepository.GetComplain(id);
            if (complains is null) return NotFound(new { message = "Not Found" });

            complains.Reply = complain.Reply;

            _complainRepository.UpdateComplainReply(complains);
            return Ok(new { message = "Complain Update successfull" });
        }

    }
}
