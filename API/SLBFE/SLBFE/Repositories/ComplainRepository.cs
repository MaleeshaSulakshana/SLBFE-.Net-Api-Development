using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class ComplainRepository : IComplainRepository
    {
        protected ModelsDbContext _context;

        public ComplainRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public void AddComplain(Complain complain)
        {
            _context.Add(complain);
            _context.SaveChanges();
        }

        public Complain GetComplain(int id)
        {
            return _context.Complain.AsNoTracking().FirstOrDefault(c => c.ComplainId == id);
        }

        public IEnumerable<Complain> GetComplainByNid(string id)
        {
            return _context.Complain.Where(c => c.CitizenNid == id).ToList();
        }

        public IEnumerable<Complain> GetComplains()
        {
            return _context.Complain.AsNoTracking().ToList();
        }

        public void UpdateComplainReply(Complain complain)
        {
            _context.Update(complain);
            _context.SaveChanges();
        }

        /*public Complain GetComplain(int id)
        {
            return _context.Complain.AsNoTracking().FirstOrDefault(c => c.ComplainId == id);
        }

        public void AddComplain(Complain complain)
        {
            _context.Complain.Add(complain);
            _context.SaveChanges();
        }

        public IEnumerable<Complain> GetComplains()
        {
            return _context.Complain.AsNoTracking().ToList();
        }

        public void UpdateComplainReply(Complain complain)
        {
            _context.Complain.Update(complain);
            _context.SaveChanges();
        }
    }*/
    }
}
